<template>
   <section>
        <Header class="dark"/>
        <BillingDetail/>
        <CartTable/>
   </section>
</template>

<script>
import Header from '../components/Header';
import BillingDetail from '../components/BillingDetail';
import CartTable from '../components/CartTable';

export default {
    components: {
        Header,
        BillingDetail,
        CartTable,
    },
}
</script>
