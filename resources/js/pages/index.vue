<template>
    <div>
        <app-header></app-header>
            <br/>

            <transition name=fade mode="out-in" appear>
                <router-view></router-view>
            </transition>

            <br/>
        <app-footer :date="date"></app-footer>
    </div>
</template>

<script>
import AppHeader from '../components/header';
import AppFooter from '../components/footer';
export default {
    components : {
        AppHeader,AppFooter
    },
    data : () => {
        return {
            date :  "2020",
        }
    }
}
</script>

<style scoped>
    .fade-enter-active,.fade-leave-active{
        transition: all 0.2s;
    }
    .fade-enter, .fade-leave-to{
        opacity: 0;
        transform: translate(10px);
    }
</style>
