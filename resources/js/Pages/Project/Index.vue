<template>
  <app-layout>
    <template #header>
      <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Projects Management
        </h2>
        <inertia-link
          :href="route('project.create')"
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
                  <th class="px-4 py-2">Project Name</th>
                  <th class="px-4 py-2">Image</th>
                  <th class="px-4 py-2">Discraption</th>
                  <th class="px-4 py-2">Status</th>
                  <th class="px-4 py-2">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="(project, i) in projects.data"
                  :key="project.id"
                  :class="{ 'bg-gray-100': i % 2 !== 0 }"
                >
                  <td class="border px-4 py-2">
                    {{ i + 1 }}
                  </td>
                  <td class="border px-4 py-2">
                    {{ project.title }}
                  </td>
                  <td class="border px-4 py-2">
                    <div
                      class="w-16 h-16 object-cover bg-cover bg-center bg-no-repeat rounded-full"
                      :style="
                        'background-image: url(' + project.image_url + ')'
                      "
                    ></div>
                  </td>
                  <td
                    class="border px-4 py-2"
                    v-html="project.discraption.substring(0, 150) + '...'"
                  ></td>
                  <td class="border px-4 py-2">
                    <div class="rounded-3xl text-white px-2 py-1 text-center" :class="getStatus(project.status,project.deleted_at).color">
                      {{getStatus(project.status,project.deleted_at).text}}
                    </div>
                  </td>
                  <td class="border px-4 py-2">
                    <div class="flex justify-around items-center">

                      <inertia-link v-if="project.deleted_at" preserveScroll :href="route('project.restore',project.id)" class="bg-transparent mx-1 focus:outline-none">
                        <icon name="restore"></icon>
                      </inertia-link>
                      <div class="flex justify-around items-center" v-else>
                        <inertia-link :href="route('project.show',project.id)" class="bg-transparent mx-1 focus:outline-none">
                          <icon name="eye"></icon>
                        </inertia-link>
                        <inertia-link :href="route('project.edit',project.id)" class="bg-transparent mx-1 focus:outline-none">
                          <icon name="edit"></icon>
                        </inertia-link>
                      </div>
                      <button
                          class="bg-transparent mx-1 focus:outline-none"
                          @click="deleteItem = project.id"
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
            <template #title> Delete Project </template>

            <template #content>
              Are you sure want to delete this Project?
            </template>

            <template #footer>
              <jet-secondary-button @click.native="deleteItem = null">
                Nevermind
              </jet-secondary-button>

              <jet-danger-button
                class="ml-2"
                @click.native="deleteproject"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
              >
                Delete
              </jet-danger-button>
            </template>
          </jet-confirmation-modal>
          <pagination
            v-if="projects.total > 20"
            :links="projects.links"
            :total="projects.total"
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
import Icon from '../../Jetstream/Icon.vue';
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
    projects: Object,
  },
  methods: {
    deleteproject() {
      // console.log(this.deleteItem);
      if(this.deleteItem){
        this.form.delete(this.route('project.destroy',this.deleteItem),{
           preserveScroll: true,
        })
            .then((res)=>{
            }).catch(err => console.log(err))
      }
    },
    getStatus(status, deleted_at){
      let content = {};
      if(deleted_at !== null){
        content.color = 'bg-red-500';
        content.text = 'Deactivate';
      }else{
        if(status){
          content.color = 'bg-indigo-500';
          content.text = 'Completed';
        }else{
          content.color = 'bg-yellow-500';
          content.text = 'Ongoing';
        }
      }
      return content;
    }
  },
  components: {
    AppLayout,
    JetConfirmationModal,
    JetDangerButton,
    JetSecondaryButton
  },
};
</script>
