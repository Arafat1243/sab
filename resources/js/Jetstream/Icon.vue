<template>
  <svg
    v-if="name === 'eye'"
    :class="aclass"
    class="text-blue-500"
    xmlns="http://www.w3.org/2000/svg"
    fill="none"
    viewBox="0 0 24 24"
    stroke="currentColor"
  >
    <path
      stroke-linecap="round"
      stroke-linejoin="round"
      stroke-width="2"
      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
    />
    <path
      stroke-linecap="round"
      stroke-linejoin="round"
      stroke-width="2"
      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
    />
  </svg>
  <svg
    v-else-if="name === 'edit'"
    :class="aclass"
    class="text-green-500"
    xmlns="http://www.w3.org/2000/svg"
    fill="none"
    viewBox="0 0 24 24"
    stroke="currentColor"
  >
    <path
      stroke-linecap="round"
      stroke-linejoin="round"
      stroke-width="2"
      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
    />
  </svg>
  <svg
    v-else-if="name === 'delete'"
    :class="aclass"
    class="text-red-500"
    xmlns="http://www.w3.org/2000/svg"
    fill="none"
    viewBox="0 0 24 24"
    stroke="currentColor"
  >
    <path
      stroke-linecap="round"
      stroke-linejoin="round"
      stroke-width="2"
      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
    />
  </svg>
  <svg
    v-else-if="name === 'plus'"
    :class="aclass"
    class="w-5 h-5"
    xmlns="http://www.w3.org/2000/svg"
    fill="none"
    viewBox="0 0 24 24"
    stroke="currentColor"
  >
    <path
      stroke-linecap="round"
      stroke-linejoin="round"
      stroke-width="2"
      d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
    />
  </svg>
  <svg
    v-else-if="name === 'restore'"
    xmlns="http://www.w3.org/2000/svg"
    :class="aclass"
    viewBox="0 0 448 448"
  >
    <g fill="#235b73" xmlns="http://www.w3.org/2000/svg">
      <path
        d="M256 32C149.97 32 64 117.97 64 224H0l85.33 85.33L170.67 224h-64c0-82.45 66.88-149.33 149.33-149.33S405.33 141.55 405.33 224 338.45 373.33 256 373.33a148.46 148.46 0 01-86.61-27.84l-30.19 30.62C171.63 401.07 212.05 416 256 416c106.03 0 192-85.97 192-192S362.03 32 256 32z"
        data-original="#000000"
      />
      <path
        d="M298.67 224c0-23.57-19.1-42.67-42.67-42.67s-42.67 19.1-42.67 42.67 19.1 42.67 42.67 42.67 42.67-19.1 42.67-42.67z"
        data-original="#000000"
      />
    </g>
  </svg>
  <svg
    v-else-if="name === 'check'"
    :class="aclass"
    xmlns="http://www.w3.org/2000/svg"
    fill="none"
    viewBox="0 0 24 24"
    stroke="currentColor"
  >
    <path
      stroke-linecap="round"
      stroke-linejoin="round"
      stroke-width="2"
      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
    />
  </svg>
  <svg
    v-else-if="name === 'error'"
    :class="aclass"
    xmlns="http://www.w3.org/2000/svg"
    fill="none"
    viewBox="0 0 24 24"
    stroke="currentColor"
  >
    <path
      stroke-linecap="round"
      stroke-linejoin="round"
      stroke-width="2"
      d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"
    />
  </svg>
  <svg v-else-if="name === 'close'" :class="aclass" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
</template>
<script>
export default {
  props: {
    name: String,
    aclass: {
      type: String,
      default: 'w-5 h-5'
    },
  },
};
</script>