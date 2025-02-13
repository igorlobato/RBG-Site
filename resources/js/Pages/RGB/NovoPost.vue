<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, useForm, usePage } from '@inertiajs/vue3';

const page = usePage();
const topicos = page.props.topicos; // Pega os tópicos do banco de dados
const user = page.props.auth.user;
console.log(topicos);

const form = useForm({
  title: '',
  content: '',
  topico_id: '',
  imagem: null,
});

const submitForm = () => {
  form.post(route('post.store'), {
    onSuccess: () => {
      form.reset();
      alert('Post criado com sucesso!');
    },
    onError: () => {
      alert('Erro ao criar o post.');
    },
  });
};
</script>

<template>
    <Head title="Novo Post" />

    <AppLayout>
        <div class="max-w-4xl mx-auto py-8">
        <h2 class="text-2xl font-bold mb-4">Criar Novo Post</h2>

        <form @submit.prevent="submitForm">
            <div class="mb-4">
                <label for="topico" class="block text-sm font-medium text-gray-700">Tópico</label>
                <select
                    v-model="form.topico_id"
                    id="topico"
                    name="topico"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm"
                    required
                >
                    <option value="" disabled hidden>Selecione um Tópico</option>
                    <option v-for="topico in topicos" :key="topico.id" :value="topico.id">
                        {{ topico.titulo }}
                    </option>
                </select>
            </div>

            <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
            <input
                v-model="form.title"
                type="text"
                id="title"
                name="title"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm"
                required
            />
            </div>

            <div class="mb-4">
            <label for="content" class="block text-sm font-medium text-gray-700">Descrição</label>
            <textarea
                v-model="form.content"
                id="content"
                name="content"
                rows="5"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm"
                required
            ></textarea>
            </div>

            <!-- Upload de imagem -->
            <div class="mb-4">
                <label for="imagem" class="block text-sm font-medium text-gray-700">Imagem</label>
                <input
                    type="file"
                    id = "imagem"
                    @change="form.imagem = $event.target.files[0]"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm"
                >
            </div>


            <div class="flex justify-end">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md">
                Criar Post
            </button>
            </div>
        </form>
        </div>
    </AppLayout>
  </template>

  <style scoped>
  /* Adicione estilos específicos aqui */
  </style>
