"use client";

import { useState } from "react";
import "leaflet/dist/leaflet.css";

import { MapContainer, TileLayer } from "react-leaflet";

import { APP_CONFIG } from "@/config/app";

import useCurrentLocation from "../hooks/useCurrentLocation";
import UserLocationMarker from "./UserLocationMarker";
import StationMarkers from "./StationMarkers";
import MapController from "./MapController";
import BottomSheet from "./BottomSheet";

export default function MapViewClient() {
  const { location } = useCurrentLocation();

  const [selectedStation, setSelectedStation] = useState(null);
  return (
    <div className="relative h-full">
      <MapContainer
        center={[
          APP_CONFIG.map.defaultCenter.lat,
          APP_CONFIG.map.defaultCenter.lng,
        ]}
        zoom={APP_CONFIG.map.defaultZoom}
        className="h-full w-full"
        zoomControl={false}
      >
        <BottomSheet
          station={selectedStation}
          onClose={() => setSelectedStation(null)}
        />

        <TileLayer
          attribution="&copy; OpenStreetMap contributors"
          url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
        />

        <MapController location={location} />

        <UserLocationMarker location={location} />

        <StationMarkers
          location={location}
          onSelectStation={setSelectedStation}
        />
      </MapContainer>
    </div>
  );
}
