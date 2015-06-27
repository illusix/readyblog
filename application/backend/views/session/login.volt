<form action="{{ form.getAction() }}" method="post" class="form-signin">
    {{ form.render('csrf', ['value': security.getToken()]) }}
    <p class="text-warning">{{ form.messages('csrf') }}</p>

    <h2 class="form-signin-heading">Please sign in</h2>
    {{ form.render('login', ['class' : 'form-control']) }}
    <p class="text-warning">{{ form.messages('login') }}</p>

    {{ form.render('password', ['class' : 'form-control']) }}
    <p class="text-warning">{{ form.messages('password') }}</p>

    {{ form.render('submit', ['class' : 'btn btn-lg btn-primary btn-block']) }}
</form>