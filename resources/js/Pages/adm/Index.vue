<script setup>
import Adm from '@/Layouts/Adm.vue';
import VueApexCharts from 'vue3-apexcharts';

const { dashboardData } = defineProps({
    dashboardData: Object
})

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
console.log(dashboardData)

const donut = [
    dashboardData.linguagens, dashboardData.arquitetura,
    dashboardData.banco, dashboardData.redes, dashboardData.derivados, dashboardData.seguranca
]

const op = {
    options: {},
    series: [
        dashboardData.linguagens, dashboardData.arquitetura, dashboardData.banco,
        dashboardData.redes, dashboardData.derivados, dashboardData.seguranca
    ],
    labels: [
        "Linguagens", "Arquitetura", "Banco", "Redes", "Derivados", "Segurança"
    ]
}

const donutOptions = [
    "Linguagens", "Arquitetura", "Banco", "Redes", "Derivados", "Segurança"
]

</script>

<template>
    <Adm title="Admin - Dashboard" page="dashboard">
        <section class="h-full w-full gap-3 flex flex-col">
            <h1 class="font-black text-4xl">Dashboard</h1>
            <div class="grid grid-cols-4 gap-2 min-h-[150px]">
                <div class="h-full rounded-md w-full bg-blue-100 flex center px-4 border-l-[6px] border-cyan-500">
                    <div class="w-2/3 flex flex-col gap-2">
                        <span class="font-semibold text-lg">Qt. Livros</span>
                        <span class="text-3xl font-black">{{ dashboardData.qtBooks }}</span>
                    </div>
                    <i class="pi pi-book text-5xl text-cyan-500"></i>
                </div>

                <div class="h-full rounded-md w-full bg-emerald-100 flex center px-4 border-l-[6px] border-emerald-500">
                    <div class="w-2/3 flex flex-col gap-2">
                        <span class="font-semibold text-lg">Qt. Usuarios</span>
                        <span class="text-3xl font-black">{{ dashboardData.qtUsers }}</span>
                    </div>
                    <i class="pi pi-users text-5xl text-green-500"></i>
                </div>

                <div class="h-full rounded-md w-full bg-yellow-100 flex center px-4 border-l-[6px] border-amber-500">
                    <div class="w-2/3 flex flex-col gap-2">
                        <span class="font-semibold text-lg">Emprestimos</span>
                        <span class="text-3xl font-black">{{ dashboardData.qtBorrows }}</span>
                    </div>
                    <i class="pi pi-bookmark text-5xl text-amber-500"></i>
                </div>

                <div class="h-full rounded-md w-full bg-rose-100 flex center px-4 border-l-[6px] border-rose-500">
                    <div class="w-2/3 flex flex-col gap-2">
                        <span class="font-semibold text-lg">Emprestimos Vencidos</span>
                        <span class="text-3xl font-black">{{ dashboardData.qtNotReturned }}</span>
                    </div>
                    <i class="pi pi-times-circle text-5xl text-rose-500"></i>
                </div>

            </div>
            <div class="flex w-full h-[400px] rounded-md gap-3">
                <div class="w-3/5 h-full px-4 flex center bg-slate-200 rounded-md">
                    <div class="w-4/6">
                        <apexchart type="bar" :options="options" :series="series"></apexchart>
                    </div>
                </div>
                <div class="w-2/5 flex center h-full bg-slate-200 rounded-md">
                    <div class="w-full">
                        <apexchart type="donut" :options="op" :series="donut"></apexchart>
                    </div>
                </div>
            </div>
        </section>
    </Adm>
</template>


