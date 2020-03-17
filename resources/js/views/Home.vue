<template>
    <section class="home">
        <Header/>
    </section>
</template>

<script>
import Header from '../components/Header';

export default {
    components: {
        Header,
    },
    mounted() {
        console.log('Holas');
    }
}
</script>
