<template>
  <app-layout>
    <template #header>
      <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Service
        </h2>
        <inertia-link
          :href="route('service.create')"
          class="inline-flex items-center bg-indigo-500 text-white py-1 px-2 rounded text-xl shadow"
        >
          <icon name="plus" aclass="text-white mr-1"></icon>
          Add
        </inertia-link>
      </div>
    </template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <div class="overflow-x-auto overflow-y-hidden lg:overflow-hidden">
            <table class="table-auto">
              <thead>
                <tr>
                  <th class="px-4 py-2">#</th>
                  <th class="px-4 py-2">Service Name</th>
                  <th class="px-4 py-2">Image</th>
                  <th class="px-4 py-2">Discraption</th>
                  <th class="px-4 py-2">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="(service, i) in services.data"
                  :key="service.id"
                  :class="{ 'bg-gray-100': i % 2 !== 0 }"
                >
                  <td class="border px-4 py-2">
                    {{ i + 1 }}
                  </td>
                  <td class="border px-4 py-2">
                    {{ service.title }}
                  </td>
                  <td class="border px-4 py-2">
                    <div
                      class="w-16 h-16 object-cover bg-cover bg-center bg-no-repeat rounded-full"
                      :style="
                        'background-image: url(' + service.image_url + ')'
                      "
                    ></div>
                  </td>
                  <td
                    class="border px-4 py-2"
                    v-html="service.discraption.substring(0, 150) + '...'"
                  ></td>
                  <td class="border px-4 py-2">
                    <div class="flex justify-around items-center">
                      <inertia-link :href="route('service.show',service.id)" class="bg-transparent mx-1 focus:outline-none">
                        <icon name="eye"></icon>
                      </inertia-link>
                      <inertia-link href="#" class="bg-transparent mx-1 focus:outline-none">
                        <icon name="edit"></icon>
                      </inertia-link>
                      <button
                        class="bg-transparent mx-1 focus:outline-none"
                        @click="deleteItem = service.id"
                      >
                        <icon name="delete"></icon>
                      </button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- Delete Token Confirmation Modal -->
          <jet-confirmation-modal :show="deleteItem" @close="deleteItem = null">
            <template #title> Delete Service </template>

            <template #content>
              Are you sure want to delete this Service?
            </template>

            <template #footer>
              <jet-secondary-button @click.native="deleteItem = null">
                Nevermind
              </jet-secondary-button>

              <jet-danger-button
                class="ml-2"
                @click.native="deleteService"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
              >
                Delete
              </jet-danger-button>
            </template>
          </jet-confirmation-modal>
          <pagination
            v-if="services.total > 20"
            :links="services.links"
            :total="services.total"
          />
        </div>
      </div>
    </div>
  </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetConfirmationModal from "@/Jetstream/ConfirmationModal";
import JetDangerButton from "@/Jetstream/DangerButton";
export default {
  data() {
    return {
      deleteItem: null,
      form: this.$inertia.form(
        {
          id: "",
        },
        {
          resetOnSuccess: true,
        }
      ),
    };
  },
  props: {
    services: Object,
  },
  methods: {
    deleteService() {
      console.log(this.deleteItem);
      if(this.deleteItem){
        this.form.delete(this.route('service.destroy',this.deleteItem))
            .then((res)=>{
              console.log(res);
            }).catch(err => console.log(err))
      }
    },
  },
  components: {
    AppLayout,
    JetConfirmationModal,
    JetDangerButton,
    JetSecondaryButton,
  },
};
</script>
