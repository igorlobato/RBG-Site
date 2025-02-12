<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';

const page = usePage();
const user = page.props.auth.user; // Usuário autenticado (se disponível)

const form = useForm({}); // Criando o objeto para enviar a requisição

const logout = () => {
    form.post(route('logout'), {
        onFinish: () => {
            window.location.href = '/'; // Força o redirecionamento manualmente
        },
    });
};
</script>

<template>
    <div>
        <!-- Barra preta -->
        <div class="bg-black text-white py-4">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                <div class="text-lg font-bold">
                    <a href="/" class="text-white">RGB</a>
                </div>

                <!-- Navigation Links -->
                <div class="flex space-x-8">
                    <Link :href="route('home')" :class="{ 'font-bold': route().current('home') }" preserve-state preserve-scroll>
                        Página Inicial
                    </Link>
                    <Link :href="route('novopost')" :class="{ 'font-bold': route().current('novopost') }" preserve-state preserve-scroll>
                        Novo Post
                    </Link>

                    <!-- Se o usuário estiver autenticado, exibe o dropdown -->
                    <template v-if="user">
                        <div class="relative">
                            <Dropdown align="right" width="48">
                                <template #trigger>
                                    <button
                                        type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-gray-800 hover:bg-gray-700 focus:outline-none transition ease-in-out duration-150"
                                    >
                                        {{ user.name }}
                                        <svg
                                            class="ms-2 -me-0.5 h-4 w-4"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20"
                                            fill="currentColor"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                    </button>
                                </template>

                                <template #content>
                                    <DropdownLink :href="route('profile.edit')"> Perfil </DropdownLink>
                                    <DropdownLink as="button" @click.prevent="logout">
                                        Sair
                                    </DropdownLink>
                                </template>
                            </Dropdown>
                        </div>
                    </template>

                    <!-- Se o usuário NÃO estiver autenticado, exibe Login/Cadastro -->
                    <template v-else>
                        <Link :href="route('register')" :class="{ 'font-bold': route().current('register') }">
                            Login/Cadastro
                        </Link>
                    </template>
                </div>
            </div>
        </div>

        <!-- Conteudo principal com Transição suave entre páginas -->

        <transition name="fade" mode="out-in">
            <slot name="default" />
        </transition>
    </div>
</template>
<style scoped>
/* Transição de fade entre páginas */
.fade-enter-active, .fade-leave-active {
  transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to {
  opacity: 0;
}
</style>
