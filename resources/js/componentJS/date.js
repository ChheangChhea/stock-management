import { ref } from "vue";
export const useCurrentTime = () => {
  const currentTime = ref(new Date());
  return {
    currentTime,
  };
};