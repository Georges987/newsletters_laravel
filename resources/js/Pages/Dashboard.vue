<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Checkbox from '@/Components/Checkbox.vue';
export default {
    components: {
        Head,
        AuthenticatedLayout,
        Checkbox,
    },
    data() {
        return {
            title: "",
            content: "",
            one: false,
            selectedItems: [],
            items: [
                {
                    text: "Foo",
                    value: "foo"
                },
                {
                    text: "Bar",
                    value: "bar"
                },
                {
                    text: "Biz",
                    value: "biz"
                },
                {
                    text: "Buzz",
                    value: "buzz"
                }
            ]

        }
    },
    methods: {
        submit() {
            this.$inertia.post(route('sendnews'), {
                title: this.title,
                content: this.content,
                one: this.one,
            });
        },
        getItemLabel(value) {
            const item = this.items.find(item => item.value === value)
            return item ? item.text : value
        },
        removeItem(item) {
            this.selectedItems = this.selectedItems.filter(value => value !== item)
        }
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



                        <div class="container mx-auto">
                            <select v-model="selectedItems" multiple
                                class="block w-full bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                <option v-for="item in items" :key="item.value" :value="item.value"
                                    class="block w-full text-gray-700 bg-white border-b border-gray-300">
                                    {{ item.text }}
                                </option>
                            </select>
                            <div class="mt-2 space-y-2">
                                <span v-for="item in selectedItems" :key="item"
                                    class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold bg-indigo-100 text-indigo-700">
                                    {{ getItemLabel(item) }}
                                    <button @click="removeItem(item)" class="ml-2 text-indigo-700 hover:text-indigo-900">
                                        x
                                    </button>
                                </span>
                            </div>
                        </div>


                        <div @click="submit()"
                            class="p-5 my-2 cursor-pointer hover:bg-blue-800 transition-all duration-150 ease-in-out bg-blue-700 w-max">
                            Envoyer
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
