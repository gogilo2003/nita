<script setup lang="ts">
const props = defineProps({
    candidate: Object,
    serial: Number
})

const { photo, candidateName, idNumber, series, grade, testingCentre, status, uploadedBy, trade } = props.candidate
</script>
<template>
    <tr class="border-b border-gray-950">
        <td class="text-right p-3 border bg-gray-50" v-text="serial"></td>
        <td class=" bg-gray-100">
            <div class="w-24 h-24 p-2 border">
                <img class="w-full h-full object-contain border rounded-lg" :src="photo" />
            </div>
        </td>
        <td class="border p-3 bg-gray-100 break-inside-avoid">
            <div v-text="candidateName" class="text-base font-semibold"></div>
            <div class="text-sm text-gray-700"><span class="font-semibold">ID Number: </span><span v-text="idNumber"></span>
            </div>
            <div class="text-sm text-gray-700"><span class="font-semibold">Trade: </span><span
                    v-text="`(${trade.code}) ${trade.name}`"></span></div>
            <div class="text-sm text-gray-700"><span class="font-semibold">Series: </span><span v-text="series"></span>
            </div>
        </td>
        <td class="text-gray-700 p-3 border bg-gray-50">
            <div><span class="text-sm font-bold">Grade: </span><span v-text="grade"></span></div>
            <div class="flex flex-col"><span class="text-sm font-bold">Testing Center: </span><span
                    v-text="testingCentre"></span></div>
        </td>
        <td class="border p-3 bg-gray-100"></td>
    </tr>
</template>
