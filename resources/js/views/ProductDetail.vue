<template>
    <section class="single-product">
        <Header class="dark"/>
        <ProductTitle/>
        <ProductContent/>
    </section>
</template>

<script>
import Header from '../components/Header';
import ProductTitle from '../components/ProductTitle';
import ProductContent from '../components/ProductContent';


export default {
    components: {
        Header,
        ProductTitle,
        ProductContent,
    }
}
</script>
