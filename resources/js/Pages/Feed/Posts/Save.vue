<template>
    <authenticated-layout>
        <div class="flex items-center justify-center p-12">
            <div class="mx-auto w-full max-w-[550px]">
                <form action="https://formbold.com/s/FORM_ID" @submit.prevent="submit">
                    <div class="mb-5">
                        <label
                            for="name"
                            class="mb-3 block text-base font-medium text-[#07074D]"
                        >
                            Post Title
                        </label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            placeholder="Epic Cool Title"
                            v-model="form.Title"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        />
                    </div>
                        <div class="mb-5">
                        <label
                            for="description"
                            class="mb-3 block text-base font-medium text-[#07074D]"
                        >
                            Short Description
                        </label>
                        <input
                            name="email"
                            v-model="form.description"
                            placeholder="This is what my posting is generally about"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        />
                         </div>
                    <div class="mb-5">
                        <label
                            for="subject"
                            class="mb-3 block text-base font-medium text-[#07074D]"
                        >
                            Goal
                        </label>
                        <input
                            type="text"
                            name="subject"
                            id="subject"
                            placeholder="Enter the goal of the workout plan"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        />
                    </div>
                    <div class="mb-5">
                        <label
                            for="message"
                            class="mb-3 block text-base font-medium text-[#07074D]"
                        >
                            Post Body
                        </label>
                        <textarea
                            rows="4"
                            name="message"
                            id="message"
                            v-model="form.body"
                            placeholder="Type your message, give the details you cant convey in the description"
                            class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        ></textarea>
                    </div>
                    <div>
                        <button
                            class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
                            type="submit"
                        >
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </authenticated-layout>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Inertia } from '@inertiajs/inertia'
import { reactive } from 'vue'
export default {
    components: {AuthenticatedLayout},
    // data(){
    //     return {
    //         formData: {
    //             title: String,
    //             description: String,
    //             body: String
    //         }
    //     }
    // },
    //inserting a form helper
    setup () {
        const form = reactive({
            Title: "",
            description: "",
            body: "",
        })

        function submit(){
            Inertia.post('/create/posting', form)
        }
        return { form , submit}
    },

    mounted() {
         console.log('Create page mounted')
     }
}
</script>
