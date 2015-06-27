<!DOCTYPE html>
<html>
<head>
    {{ get_title() }}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/favicon.ico" rel="icon" type="image/x-icon" />
    <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    {{ javascript_include("//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js", false) }}
    {{ assets.outputCss('header') }}
</head>
<body>
<div class="wrapper">
    <header class="header">
        <div class="default-box">
            {{ link_to(['for' : 'admin-blog'], '', 'class' : 'logo') }}
            <ul class="fl-right menu">
                <li>{{ link_to(['for' : 'home'], 'Go to front-end‏') }}</li>
                <li>{{ link_to(['for' : 'admin-blog'], 'Posts') }}</li>
                <li>{{ link_to(['for' : 'admin-category'], 'Categories') }}</li>
                <li>{{ link_to(['for' : 'logout'], 'Logout') }}</li>
            </ul>
        </div>
    </header>
    {{ content() }}
    <div class="clear"></div>
</div>
<footer class="footer">
    <div class="default-box">
        <div class="copyright">Copyright © 2015 Ready.Blog for Yaroslav. All right reserved.</div>
    </div>
</footer>

{% if assets.collection('ckeditor').count() %}
   {{ assets.outputJs('ckeditor') }}
{% endif %}

{{ assets.outputJs('footer') }}
</body>
</html>