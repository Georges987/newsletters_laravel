<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
export default {
    components: {
        Head,
        AuthenticatedLayout
    },
    data() {
        return {
            title: "",
            content: ""
        }
    },
    methods: {
        submit() {
            this.$inertia.post(route('sendnews'), {
                title: this.title,
                content: this.content,
            });
        },
    }
}
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h1>
                            Envoyez des news à tous les abonnés
                        </h1>
                        <div class="my-2 grid">
                            <label for="title">Titre de la news</label>
                            <input type="text" v-model="title">
                        </div>
                        <div class="my-2 grid">
                            <label for="content">Contenu de la news</label>
                            <textarea v-model="content" cols="30" rows="10"></textarea>
                        </div>
                        <div @click="submit()" class="p-5 my-2 cursor-pointer hover:bg-blue-800 transition-all duration-150 ease-in-out bg-blue-700 w-max">
                            Envoyer
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
