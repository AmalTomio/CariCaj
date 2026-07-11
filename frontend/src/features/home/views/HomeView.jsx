import Screen from "@/shared/components/Screen";
import Container from "@/shared/components/Container";

import HomeHero from "../components/HomeHero";
import SearchSection from "../components/SearchSection";
import NearbyStationsSection from "../components/NearbyStationsSection";
import CommunityUpdatesSection from "../components/CommunityUpdatesSection";

export default function HomeView() {
  return (
    <Screen>
      <Container className="space-y-8 py-6">
        <HomeHero />

        <SearchSection />

        <NearbyStationsSection />

        <CommunityUpdatesSection />
      </Container>
    </Screen>
  );
}
