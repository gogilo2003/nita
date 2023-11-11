<script setup lang="ts">
import { Head, Link, router } from '@inertiajs/vue3';
import Candidate from '../Components/Candidate.vue';
import { ref, onMounted, watch } from 'vue';
import { debounce } from 'lodash'
import SecondaryButton from '@/Components/SecondaryButton.vue';

interface Trade {
    id: Number,
    code: String,
    name: String
}
const props = defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    candidates: Array,
    trades: Array<Trade>,
    trade: String,
    search: String,
});

const selectedTrade = ref()
const searchValue = ref()

onMounted(() => {
    selectedTrade.value = props.trade
    searchValue.value = props.search
})

// watch(() => selectedTrade.value, (value, newval) => {
//     console.log(value, newval);

//     // if (value) {
//     //     request()
//     // }
// })

watch(() => searchValue.value, debounce((value, old) => {
    console.log(value, props.search);

    if (value !== props.search) {
        request()
    }
}, 500))

const request = () => {
    router.get(route('welcome'), { search: searchValue.value, trade: selectedTrade.value }, {
        only: ['candidates', 'trade', 'search']
    })
}

const download = () => {
    const url = route('welcome', { search: searchValue.value, trade: selectedTrade.value, download: 1 })
    const link = document.createElement('a');
    link.href = url
    link.target = '_BLANK'
    link.click()

}
</script>

<template>
    <Head title="Welcome" />
    <div>
        <div class="py-6 text-3xl font-bold uppercase text-center">
            NITA Details Confirmation
        </div>
        <div class="flex gap-3 items-center">
            <select v-model="selectedTrade" @change="request">
                <option :value="null">Select Trade</option>
                <option v-for="{ id, code, name } in trades" :value="id" v-text="`${code}-${name}`"></option>
            </select>
            <div>
                <input type="search" v-model="searchValue" placeholder="search" />
            </div>
            <div>
                <SecondaryButton @click="download">Download</SecondaryButton>
            </div>
        </div>
    </div>
    <table class="w-full border print-friendly border-collapse">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-3"></th>
                <th class="p-3" colspan="2">Name/ID/Trade/Series</th>
                <th class="p-3">Grade/Testing Center</th>
                <th class="p-3">Signature & Date</th>
            </tr>
        </thead>
        <tbody>
            <Candidate v-for="(candidate, index) in candidates" :serial="index + 1" :candidate="candidate" />
        </tbody>
    </table>
</template>

