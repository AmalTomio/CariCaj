"use client";

import { useState } from "react";
import { useNearbyStations } from "@/features/station/hooks/useNearbyStations";
import StationCard from "@/features/station/components/StationCard";
// import { useStations } from "@/features/station/hooks/useStations";

import { getCurrentPosition } from "@/infrastructure/geolocation/browserLocation";

import { Button } from "@/components/ui/button";
import SectionHeader from "@/shared/components/SectionHeader";

import { MapPin } from "lucide-react";

export default function NearbyStationsSection() {
  const [location, setLocation] = useState(null);
  const [locating, setLocating] = useState(false);

 const {
  data: stations = [],
  isLoading,
  isError,
} = useNearbyStations(
  location
    ? {
        lat: location.lat,
        lng: location.lng,
        radius: 25,
        limit: 5,
      }
    : {}
);

  async function enableLocation() {
    try {
      setLocating(true);

      const position = await getCurrentPosition();

      setLocation({
        lat: position.coords.latitude,
        lng: position.coords.longitude,
      });
    } catch (error) {
      console.error(error);

      alert(
        "Unable to access your location. Please allow location permission."
      );
    } finally {
      setLocating(false);
    }
  }

  return (
    <section className="space-y-5">
      <SectionHeader
        title="Nearby Stations"
        action="View All"
      />

      {!location && (
        <div className="rounded-2xl border bg-card p-5">
          <div className="flex items-start gap-4">
            <div className="rounded-full bg-emerald-100 p-3">
              <MapPin className="h-5 w-5 text-emerald-600" />
            </div>

            <div className="flex-1">
              <h3 className="font-semibold">
                Find stations near you
              </h3>

              <p className="mt-1 text-sm text-muted-foreground">
                Enable your current location to see the nearest charging
                stations and estimated distance.
              </p>

              <Button
                className="mt-4"
                onClick={enableLocation}
                disabled={locating}
              >
                {locating
                  ? "Getting Location..."
                  : "Enable Location"}
              </Button>
            </div>
          </div>
        </div>
      )}

      {isLoading &&
        Array.from({ length: 3 }).map((_, index) => (
          <StationCard
            key={index}
            loading
          />
        ))}

      {!isLoading && isError && (
        <p className="text-sm text-muted-foreground">
          Unable to load stations.
        </p>
      )}

      {!isLoading &&
        !isError &&
        stations.map((station) => (
          <StationCard
            key={station.id}
            station={station}
          />
        ))}
    </section>
  );
}