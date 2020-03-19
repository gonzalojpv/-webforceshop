<template>
    <section class="home">
        <Header/>
        <Slider/>
        <TextBlock/>
        <GridProducts/>
    </section>
</template>

<script>
import Header from '../components/Header';
import Slider from '../components/Slider';
import TextBlock from '../components/TextBlock';
import GridProducts from '../components/GridProducts';

export default {
    components: {
        Header,
        Slider,
        TextBlock,
        GridProducts
    },
}
</script>
