<template >
  <div class="wrapper">
    <div class="container">
      <div id="header">
        <div id="headTitle">
          <div id="logo"><img alt="Healthbook" height="44" src="img/logo.png" width="70" /></div>
          <h1 id="title">メニュー</h1>
        </div>
        <ol id="topicPath">
          <li id="tpHome"><a href="/" title="メニューへ移動する"><img alt="" height="28" src="img/topicPath_home.png"
                width="28" /></a></li>
        </ol>
        <div id="headInfo">
          <div id="date-info">
            <span class="icon"></span>
            <p id="todays" title="PM 4:45">2022/08/19</p>
          </div>
          <div id="user-info">
            <span class="icon"></span>
            <p id="userName">システム
              <a href="/login/logout" id="btnlogout" title="ログアウト">ログアウト</a>
            </p>
          </div>
        </div>
      </div>
    </div>
    <div id="contents">
      <div id="menu">
        <ul class="clearfix">
          <li>
            <dl>
              <dt>
                <router-link to="/brands">
                  <img alt="タックシール印刷" height="168" src="img/tuck_seal.png" width="168">
                </router-link>
              </dt>
              <dd>
                <span>Brand</span>
              </dd>
            </dl>
          </li>
          <li>
            <dl>
              <dt>
                <router-link to="/supplies">
                  <img alt="タックシール印刷" height="168" src="img/tuck_seal.png" width="168">
                </router-link>
              </dt>
              <dd>
                <span>Suppliyer</span>
              </dd>
            </dl>
          </li>
          <li>
            <dl>
              <dt>
                <router-link to="/group">
                  <img alt="タックシール印刷" height="168" src="img/tuck_seal.png" width="168">
                </router-link>
              </dt>
              <dd>
                <span>Group Product</span>
              </dd>
            </dl>
          </li>
          <li>
            <dl>
              <dt>
                <router-link to="/serailcode">
                  <img alt="タックシール印刷" height="168" src="img/tuck_seal.png" width="168">
                </router-link>
              </dt>
              <dd>
                <span>Serail Code</span>
              </dd>
            </dl>
          </li>
        </ul>
      </div>
    </div>

  </div>

</template>

