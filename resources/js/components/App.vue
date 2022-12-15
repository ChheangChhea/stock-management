<template >
  <div class="wrapper">
    <div class="container-fuild">
   <div id="header">
        <div id="headTitle">
          <div id="logo"><img alt="Healthbook" height="44" src="img/logo.png" width="70"></div>
          <h1 id="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Patient master</font></font></h1>
        </div>
        <ol id="topicPath">
          <!-- <li id="tpHome"><a href="App" title="go to menu"><img alt="" height="28" src="img/topicPath_home.png" width="28"></a></li>               -->
          <li id="tpHome"><a href="/"> <img alt="" height="28" src="img/topicPath_home.png" width="28"></a></li> 
              <li>
                  <a href="dashbaord"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Master Admin</font></font></a>
              </li>
        </ol>
        <div id="headInfo">
          <div id="date-info">
            <span class="icon"></span>
            <p id="todays" original-title="PM12:13"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2022/08/25</font></font></p>
          </div>
          <div id="user-info">
            <span class="icon"></span>
            <p id="userName"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">system 
              </font></font><a href="/login/logout" id="btnlogout" original-title="logout"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">logout</font></font></a></p>
          </div>
        </div>
        <!-- / #header --></div>
    </div>
    <div id="contents">
      <div id="menu">
        <ul class="clearfix">
          <li>
            <dl>
              <dt>
                <router-link to="/viewproduct">
                  <img
                    alt="タックシール印刷"
                    height="168"
                    src="img/icon-product.png"
                    width="168"
                  />
                </router-link>
              </dt>
              <dd>
                <span>Products Stock</span>
              </dd>
            </dl>
          </li>
          <li>
            <dl>
              <dt>
                <router-link to="/menuclinic">
                  <img
                    alt="タックシール印刷"
                    height="168"
                    src="img/icon-category.png"
                    width="168"
                  />
                </router-link>
              </dt>
              <dd>
                <span>Pharmacy</span>
              </dd>
            </dl>
          </li>
          <li>
            <dl>
              <dt>
                <router-link to="/menumedical">
                  <img
                    alt="タックシール印刷"
                    height="168"
                    src="img/icon-brand.png"
                    width="168"
                  />
                </router-link>
              </dt>
              <dd>
                <span>Clinic</span>
              </dd>
            </dl>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>
<script>
import { useCurrentTime } from "../componentJS/date";
export default {
  setup() {
    const { currentTime } = useCurrentTime();
    return { currentTime };
  },
};
</script>

