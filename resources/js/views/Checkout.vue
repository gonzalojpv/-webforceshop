<template>
   <section>
        <Header class="dark"/>
        <BillingDetail/>
   </section>
</template>

<script>
import Header from '../components/Header';
import BillingDetail from '../components/BillingDetail';

export default {
    components: {
        Header,
        BillingDetail,
    },
}
</script>
