<script setup lang ="ts">

</script>

<template>
    <div class="min-h-screen bg-gray-100">
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold text-gray-900">CANA (Canteen System Pre Oder)</h1>
            </div>
        </header>

        <main>
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <slot />
            </div>
        </main>

        <footer class="mt-8 text-center text-sm text-gray-500">
            &copy; {{ new Date().getFullYear() }} CANA. All rights reserved. 
        </footer>
    </div>
</template>