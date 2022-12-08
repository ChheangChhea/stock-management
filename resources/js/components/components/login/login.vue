<template>
    <body id="login">
        <div id="wrap">
        <div id="header"><!-- #header --></div>

        <div id="contents">
            <div class="inner">
            <!--#contents -->
            <div class="login-box">
    <div class="box-contents">
        <h1><img alt="healthbook" height="164" src="/img/login/login.png" width="240"></h1>
        <form accept-charset="UTF-8" action="/login" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="✓"><input name="authenticity_token" type="hidden" value="Ux1R0p1868hJ/zfO9sdBQ69MKV+c+Rs/DTBgwGkciJY="></div>
        <dl>
            <dt><img alt="Username" height="15" src="/assets/image/login/txt_id.png" width="78"></dt>
            <dd><input class="beha code text" id="user_code" name="user_code" size="20" type="text" value="" tabindex="10000">
            </dd>
            <dt><img alt="Password" height="15" src="/assets/image/login/txt_pass.png" width="70"></dt>
            <dd><input class="beha password" id="password" name="password" size="20" type="password" value="" tabindex="10001"></dd>
        </dl>
        <div class="buttons">
            <!-- <div class="button" id="uniform-undefined">
                <span>Login<input type="button" value="edit" onclick="move_url('/master/jusinsya/edit')" tabindex="10028" style="opacity: 0; width: 76px;"></span>
                <input type="button" value="選択" class="button mini gra-orange" onclick="open_assist(500,500,'事業所検索' , '/assist/assist_jigyosyo_search/index' , set_search_jigyosyo )" style="opacity: 0; width: 50px;" tabindex="10012">
            </div> -->
                <input type="button" value="ログイン" onclick="submit()" class="nostyle" tabindex="10002">
                <input type="button" value="login" class="type2"  style="opacity: 0; width: 63px" tabindex="10026"/>
        </div>
        </form>  
    </div>
</div>
    
            <!--▲コンテンツ-->
            <!-- / #contents -->
            </div>
        </div>
        </div>

        <div id="footer">
        <div id="copyright">Copyright (C) healthbook. ALL Right s Researved</div>
        </div>
    
    </body>
</template>