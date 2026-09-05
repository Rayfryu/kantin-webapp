<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AppLayout from '../layouts/AppLayout.vue';

defineProps<{
    status: String;
    environment: String;
    appName:String;
}>();
</script>

<template>
    <Head title="beranda" />

    <AppLayout>
        <div class="bg-white overlow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-semibold text-green-600 mb-4">Sistem Beroperasi Normal</h2>

                <div class="grid grid-cols-2 gap-4 text-gray-700">
                    <div class="font-medium">Aplikasi:</div>
                    <div>{{ appName }}</div>

                    <div class="font-medium">Status:</div>
                    <div>{{ status }}</div>

                    <div class="font-medium">Lingkungan:</div>
                    <div><span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full">{{ environment }}</span></div>

                </div>
            </div>
        </div>
    </AppLayout>
</template>