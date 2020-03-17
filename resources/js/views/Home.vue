<template>
    <section class="home">
        <Header/>
        <Slider/>
    </section>
</template>

<script>
import Header from '../components/Header';
import Slider from '../components/Slider';

export default {
    components: {
        Header,
        Slider
    },
    mounted() {
        console.log('Holas');
    }
}
</script>
