<template >
  <div class="wrapper">
    <Header />
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
                    src="img/icon-pharmacy.png"
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
                    src="img/icon-clinic.png"
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
<script setup>
import Header from "../components/Header.vue";
</script>

