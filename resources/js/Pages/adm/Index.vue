<script setup>
import Adm from '@/Layouts/Adm.vue';
import VueApexCharts from 'vue3-apexcharts';

const { dashboardData } = defineProps({
    dashboardData: Object
})

console.log(dashboardData)
const options = {
    chart: {
        id: 'vuechart-example'
    },
    xaxis: {
        categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998]
    }
}
const series = [{
    name: 'series-1',
    data: [30, 40, 45, 50, 49, 60, 70, 91]
}]
</script>


<template>
    <Adm title="Admin - Dashboard" page="dashboard">
        <section class="h-full w-full gap-5 flex flex-col">
            <div class="grid grid-cols-4 gap-2 min-h-[150px]">
                <div class="h-full rounded-md w-full bg-blue-100">
                </div>
                <div class="h-full rounded-md w-full bg-blue-100"></div>
                <div class="h-full rounded-md w-full bg-blue-100"></div>
                <div class="h-full rounded-md w-full bg-blue-100"></div>
            </div>
            <div class="flex w-full h-[60vh] rounded-md gap-3">
                <div class="w-1/2 h-full bg-emerald-100 rounded-md">
                    <div class="h-auto">
                        <apexchart type="bar" :options="options" :series="series"></apexchart>
                    </div>

                </div>
                <div class="w-1/2 h-full bg-cyan-100 rounded-md">
                    <div>
                        <apexchart type="bar" :options="options" :series="series"></apexchart>
                    </div>
                </div>
            </div>
        </section>
    </Adm>
</template>


