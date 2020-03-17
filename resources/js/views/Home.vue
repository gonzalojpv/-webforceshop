<template>
    <section class="home">
        <Header/>
        <Slider/>
        <TextBlock/>
    </section>
</template>

<script>
import Header from '../components/Header';
import Slider from '../components/Slider';
import TextBlock from '../components/TextBlock';

export default {
    components: {
        Header,
        Slider,
        TextBlock
    },
    mounted() {
        console.log('Holas');
    }
}
</script>
