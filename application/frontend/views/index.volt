<!DOCTYPE html>
<html>
<head>
    {{ get_title() }}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ description }}">
    <link href="/favicon.ico" rel="icon" type="image/x-icon" />
    <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    {{ javascript_include("//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js", false) }}
    {{ assets.outputCss('header') }}
</head>
<body>
<div class="wrapper">
    <header class="header">
        <div class="default-box">
            {{ link_to(['for' : 'home'], '', 'class' : 'logo') }}
            <ul class="fl-right menu">
                {% set menu_list = ['About','Contact'] %}
                <li>{{ link_to(['for' : 'home'], 'Home') }}</li>
                {% for link in menu_list %}
                    <li>{{ link_to(['for' : 'static', 'alias' : link|lower], link) }}</li>
                {% endfor %}
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
{{ assets.outputJs('footer') }}

</body>
</html>