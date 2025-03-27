<template>
  <div class="flex overflow-hidden flex-col items-center px-20 pt-7 pb-32 bg-white max-md:px-5 max-md:pb-24">
    <NavigationHeader />
    <HeroSection />
    <FeaturesSection />
  </div>
      <!-- Footer -->
      <footer class="bg-white shadow-inner py-4">
      <div class="container mx-auto text-center text-sm text-gray-600">
        &copy; 2025 Kasir GWL. All rights reserved.
      </div>
    </footer>
</template>


<script>
import NavigationHeader from "../Components/NavigationHeader.vue";
import HeroSection from "../Components/HeroSection.vue";
import FeaturesSection from "../Components/FeaturesSection.vue";

export default {
  name: "LandingPage",
  components: {
    NavigationHeader,
    HeroSection,
    FeaturesSection,
  },
};
</script>
