<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Create New Project
      </h2>
    </template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <div
            v-if="project || image_url"
            class="w-24 h-24 float-right mr-3 mt-2 object-cover bg-cover bg-center bg-no-repeat rounded"
            :style="
              image_url
                ? 'background-image: url(' + image_url + ')'
                : 'background-image: url(' + project.image_url + ')'
            "
          ></div>
          <form
            ref="saveProject"
            @submit.prevent="saveProject"
            class="w-full py-3 flex flex-wrap justify-between items-center"
          >
            <!-- Name -->
            <div class="w-full px-3" :class="project ? 'md:w-2/5' : 'md:w-1/2'">
              <jet-label value="Project Title" />
              <jet-input
                ref="title"
                type="text"
                class="mt-1 block w-full"
                v-model="form.title"
                autocomplete="title"
              />
              <jet-input-error :message="form.error('title')" class="mt-2" />
            </div>

            <!-- image -->
            <div class="w-full px-3" :class="project ? 'md:w-2/5' : 'md:w-1/2'">
              <jet-label value="Image" />
              <input
                type="file"
                @change="setImg"
                accept="image/*"
                class="w-full mt-1 block form-input rounded-md shadow-sm"
                ref="image"
              />
              <jet-input-error :message="form.error('image')" class="mt-2" />
            </div>
            <!-- Status -->
            <div class="w-full md:w-1/5 px-3" v-if="project">
              <jet-label value="Project Status" />
              <select class="border border-gray-300 rounded-md shadow-md p-2 mt-1 block w-full focus:outline-none" v-model="form.status">
                <option value="0">Ongoing</option>
                <option value="1">Completed</option>
              </select>
              <jet-input-error :message="form.error('status')" class="mt-2" />
            </div>
            <!-- Discription -->
            <div class="w-full px-3">
              <jet-label value="Discraption" />
              <textarea
                class="w-full mt-1 block rounded border border-gray-400 focus:outline-none px-2 py-2"
                v-model="form.discraption"
                id=""
                rows="10"
                placeholder="Discraption"
              ></textarea>
              <jet-input-error
                :message="form.error('discraption')"
                class="mt-2"
              />
            </div>
            <div
              class="w-full flex order-0 items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6"
            >
              <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Saved.
              </jet-action-message>

              <jet-button
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
              >
                Save
              </jet-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";
import JetActionMessage from "@/Jetstream/ActionMessage";
export default {
  data() {
    return {
      image_url: null,
      form: this.$inertia.form(
        {
          title: this.project ? this.project.title : "",
          discraption: this.project ? this.project.discraption : "",
          image: null,
          status: this.project ? this.project.status : 0,
        },
        {
          bag: "CreateProject",
          resetOnSuccess: true,
        }
      ),
    };
  },
  methods: {
    saveProject() {
      if (this.project) {
        let form = this.$inertia.form(
          {
            _method: 'PUT',
            title: this.form.title, //
            discraption: this.form.discraption,
            image: this.form.image,
            status: this.form.status
          },
          {
            bag: "CreateProject",
            resetOnSuccess: true,
          }
        );
        form.post(route("project.update", this.project.id), {
          preserveScroll: true,
        });
      } else {
        this.form
          .post(route("project.store"), {
            preserveScroll: true,
          })
          .then(() => {
            if (this.form.recentlySuccessful) {
              this.form.reset();
              this.$refs.saveProject.reset();
              this.$refs.title.focus();
              this.image_url = null;
            }
          });
      }
    },
    setImg() {
      this.form.image = this.$refs.image.files[0];
      const reader = new FileReader();

      reader.onload = (e) => {
        this.image_url = e.target.result;
      };

      reader.readAsDataURL(this.$refs.image.files[0]);
    },
  },
  props: {
    project: {
      type: Object,
      default: null,
    },
  },
  components: {
    AppLayout,
    JetActionMessage,
    JetButton,
    JetInput,
    JetInputError,
    JetLabel,
  },
};
</script>