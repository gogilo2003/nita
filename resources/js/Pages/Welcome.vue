<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import Candidate from '../Components/Candidate.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    candidates: Array
});
</script>

<template>
    <Head title="Welcome" />
    <div class="py-6 text-3xl font-bold uppercase text-center">NITA Details Confirmation</div>
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

