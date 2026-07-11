import StationCard from "@/features/station/components/StationCard";
import SectionHeader from "@/shared/components/SectionHeader";

export default function NearbyStationsSection() {
  return (
    <section className="space-y-4">
      <SectionHeader
        title="Nearby Stations"
        action="View All"
      />

      <StationCard loading />

      <StationCard loading />

      <StationCard loading />
    </section>
  );
}