<?php

namespace Library\Auth;

use Backend\Models\User;
use \Phalcon\Mvc\User\Component;

class Auth extends Component
{
    public function check($credentials)
    {
        $user = User::findFirstByLogin($credentials['login']);

        if ($user == false) {
            throw new \Exception('Wrong email/password combination');
        }

        if (!$this->security->checkHash($credentials['password'], $user->password)) {
            //throw new \Exception('Wrong email/password combination');
        }

        $this->checkUserFlags($user);

        if (isset($credentials['remember'])) {
            $this->createRememberEnviroment($user);
        }
        $this->session->set('auth-identity', array(
            'id' => $user->id,
            'name' => $user->name,
            'role' => 'admin'
        ));
    }

    public function createRememberEnviroment(User $user)
    {
        $userAgent = $this->request->getUserAgent();
        $token = md5($user->login . $user->password . $userAgent);
        $remember = new Token();
        $remember->setUserId($user->getId());
        $remember->setToken($token);

        if ($remember->save() != false) {
            $expire = time() + 86400 * 8;
            $this->cookies->set('RMU', $user->getId(), $expire);
            $this->cookies->set('RMT', $token, $expire);
        }
    }

    public function hasRememberMe()
    {
        return $this->cookies->has('RMU');
    }

    public function loginWithRememberMe()
    {
        $userId = $this->cookies->get('RMU')->getValue();
        $cookieToken = $this->cookies->get('RMT')->getValue();
        $user = User::findFirstById($userId);

        if ($user) {
            $userAgent = $this->request->getUserAgent();
            $token = md5($user->login . $user->password . $userAgent);

            if ($cookieToken == $token) {
                $remember = Token::findFirst(array(
                    'user_id = ?0 AND token = ?1',
                    'bind' => array(
                        $user->id,
                        $token
                    )
                ));
                if ($remember) {
                    if ((time() - (86400 * 8)) < $remember->getCreateAt()) {
                        $this->checkUserFlags($user);
                        $this->session->set('auth-identity', array(
                            'id' => $user->getId(),
                            'name' => $user->getLgin(),
                            'role' => $user->role->getName()
                        ));
                        return $this->response->redirect('profile');
                    }
                }
            }
        }

        $this->cookies->get('RMU')->delete();
        $this->cookies->get('RMT')->delete();

        return $this->response->redirect('session/login');
    }

    public function checkUserFlags(User $user)
    {
        return true;
    }

    public function getIdentity()
    {
        return $this->session->get('auth-identity');
    }

    public function getName()
    {
        $identity = $this->session->get('auth-identity');
        return $identity['name'];
    }

    public function remove()
    {
        if ($this->cookies->has('RMU')) {
            $this->cookies->get('RMU')->delete();
        }
        if ($this->cookies->has('RMT')) {
            $this->cookies->get('RMT')->delete();
        }
        $this->session->remove('auth-identity');
    }

    public function authUserById($id)
    {
        $user = User::findFirstById($id);

        if ($user == false) {
            throw new \Exception('The user does not exist');
        }

        $this->checkUserFlags($user);
        $this->session->set('auth-identity', array(
            'id' => $user->id,
            'name' => $user->login,
            'role' => 'admin'
        ));
    }

    public function getUser()
    {
        $identity = $this->session->get('auth-identity');

        if (isset($identity['id'])) {
            $user = User::findFirstById($identity['id']);

            if ($user == false) {
                throw new \Exception('The user does not exist');
            }

            return $user;
        }

        return false;
    }

} 