"use client";

import { Marker } from "react-leaflet";
import L from "leaflet";

import { useNearbyStations } from "@/features/station/hooks/useNearbyStations";

const stationIcon = new L.Icon({
  iconUrl: "/marker-icon.png",
  shadowUrl: "/marker-shadow.png",
  iconSize: [25, 41],
  iconAnchor: [12, 41],
});

export default function StationMarkers({
  location,
  onSelectStation,
}) {
  const { data: stations = [], isLoading } =
    useNearbyStations(
      location
        ? {
            lat: location.latitude,
            lng: location.longitude,
            radius: 25,
          }
        : {}
    );

  if (isLoading) return null;

  return (
    <>
      {stations.map((station) => (
        <Marker
          key={station.id}
          position={[
            Number(station.latitude),
            Number(station.longitude),
          ]}
          icon={stationIcon}
          eventHandlers={{
            click: () => onSelectStation?.(station),
          }}
        />
      ))}
    </>
  );
}