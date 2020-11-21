<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <jet-form-section @submitted="updateEmpolyee">
              <template #title> Add Employee Count </template>

              <template #description>
                current employee count is ({{others.employee}})
              </template>

              <template #form>
                <div class="col-span-6 sm:col-span-4">
                  <jet-label for="employee" value="Employee" />
                  <jet-input
                    id="employee"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="empolyee.employee"
                    ref="employee"
                    autocomplete="current-password"
                  />
                  <jet-input-error
                    :message="empolyee.error('employee')"
                    class="mt-2"
                  />
                </div>               
              </template>

              <template #actions>
                <jet-action-message :on="empolyee.recentlySuccessful" class="mr-3">
                  Saved.
                </jet-action-message>

                <jet-button
                  :class="{ 'opacity-25': empolyee.processing }"
                  :disabled="empolyee.processing"
                >
                  Save
                </jet-button>
              </template>
            </jet-form-section>
            <jet-section-border />
            <jet-form-section @submitted="updateClient">
              <template #title> Add Client Count </template>

              <template #description>
                current client count is ({{others.client}})
              </template>

              <template #form>
                <div class="col-span-6 sm:col-span-4">
                  <jet-label for="client" value="client" />
                  <jet-input
                    id="client"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="client.client"
                    ref="client"
                    autocomplete="current-password"
                  />
                  <jet-input-error
                    :message="client.error('client')"
                    class="mt-2"
                  />
                </div>               
              </template>

              <template #actions>
                <jet-action-message :on="client.recentlySuccessful" class="mr-3">
                  Saved.
                </jet-action-message>

                <jet-button
                  :class="{ 'opacity-25': client.processing }"
                  :disabled="client.processing"
                >
                  Save
                </jet-button>
              </template>
            </jet-form-section>
            <jet-section-border />
            <jet-form-section @submitted="updateWhatweare">
              <template #title>Manage What we Are</template>

              <template #description>
                {{others.whatweare}}
              </template>

              <template #form>
                <div class="col-span-6 sm:col-span-4">
                  <jet-label value="Discraption" />
                  <textarea
                class="w-full mt-1 block rounded border border-gray-400 focus:outline-none px-2 py-2"
                v-model="whatweare.whatweare"
                ref="whatweare"
                rows="10"
                placeholder="Discraption"
              ></textarea>
                  <jet-input-error
                    :message="whatweare.error('whatweare')"
                    class="mt-2"
                  />
                </div>               
              </template>

              <template #actions>
                <jet-action-message :on="whatweare.recentlySuccessful" class="mr-3">
                  Saved.
                </jet-action-message>

                <jet-button
                  :class="{ 'opacity-25': whatweare.processing }"
                  :disabled="whatweare.processing"
                >
                  Save
                </jet-button>
              </template>
            </jet-form-section>
            <jet-section-border />
            <jet-form-section @submitted="updateAbout">
              <template #title>Manage About us</template>

              <template #description>
                Note: if you don't want to update image then make sure to image field is empty.

                <div
                        v-if="others"
                        class="w-24 h-24 mr-3 mt-2 object-cover bg-cover bg-center bg-no-repeat rounded"
                        :style="'background-image: url(' + others.image_url + ')'"
                    ></div>
                {{others.about}}
              </template>

              <template #form>
                  <div class="col-span-6 sm:col-span-4">
                      <div
                        v-if="image_url"
                        class="w-24 h-24 mr-3 mt-2 object-cover bg-cover bg-center bg-no-repeat rounded"
                        :style="'background-image: url(' + image_url + ')'"
                    ></div>
                  </div>
                <div class="col-span-6 sm:col-span-4">
                  <jet-label value="Image" />
                  <input
                        type="file"
                        @change="setImg"
                        accept="image/*"
                        class="w-full mt-1 block form-input rounded-md shadow-sm"
                        ref="image"
                    />
                  <jet-input-error
                    :message="about.error('image')"
                    class="mt-2"
                  />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <jet-label value="Discraption" />
                  <textarea
                class="w-full mt-1 block rounded border border-gray-400 focus:outline-none px-2 py-2"
                v-model="about.about"
                id=""
                rows="10"
                placeholder="Discraption"
              ></textarea>
                  <jet-input-error
                    :message="about.error('about')"
                    class="mt-2"
                  /></div>             
              </template>

              <template #actions>
                <jet-action-message :on="about.recentlySuccessful" class="mr-3">
                  Saved.
                </jet-action-message>

                <jet-button
                  :class="{ 'opacity-25': about.processing }"
                  :disabled="about.processing"
                >
                  Save
                </jet-button>
              </template>
            </jet-form-section>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetButton from "@/Jetstream/Button";
import JetFormSection from "@/Jetstream/FormSection";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";
import JetSectionBorder from '@/Jetstream/SectionBorder'
export default {
  components: {
    JetActionMessage,
    JetButton,
    JetFormSection,
    JetInput,
    JetInputError,
    JetLabel,
    AppLayout,
    JetSectionBorder
  },

  data() {
    return {
      empolyee: this.$inertia.form(
        {
          employee: ''
        },
        {
          bag: "updateEmpolyee",
          resetOnSuccess: true,
        }
      ),
      client: this.$inertia.form(
        {
          client: ''
        },
        {
          bag: "updateClient",
          resetOnSuccess: true,
        }
      ),
      whatweare: this.$inertia.form(
        {
          whatweare: ''
        },
        {
          bag: "updateWhatweare",
          resetOnSuccess: true,
        }
      ),
      about: this.$inertia.form(
        {
            _method: 'PUT',
          about: '',
          image: null
        },
        {
          bag: "updateAbout",
          resetOnSuccess: true,
        }
      ),
      image_url: null
    };
  },
    props:{
        others: {
            type: Object,
            default: null
        }
    },
  methods: {
    updateEmpolyee() {
      this.empolyee.put(route("update-empolyee"), {
          preserveScroll: true,
        })
        .then(() => {
          this.$refs.employee.focus();
        });
    },
    updateClient() {
      this.client.put(route("update-client"), {
          preserveScroll: true,
        })
        .then(() => {
          this.$refs.client.focus();
        });
    },
    updateAbout() {
      this.about.post(route("update-about"), {
          preserveScroll: true,
        });
    },
    updateWhatweare() {
      this.whatweare.put(route("update-whatweare"), {
          preserveScroll: true,
        })
        .then(() => {
          this.$refs.whatweare.focus();
        });
    },
    setImg() {
      this.about.image = this.$refs.image.files[0];
    //   console.log();
      const reader = new FileReader();

      reader.onload = (e) => {
        this.image_url = e.target.result;
      };

      reader.readAsDataURL(this.$refs.image.files[0]);
    },
  },
};
</script>
