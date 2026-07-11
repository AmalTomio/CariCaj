"use client";

import "leaflet/dist/leaflet.css";

import { MapContainer, TileLayer } from "react-leaflet";
import { APP_CONFIG } from "@/config/app";

export default function MapViewClient() {
  return (
    <MapContainer
      center={[
        APP_CONFIG.map.defaultCenter.lat,
        APP_CONFIG.map.defaultCenter.lng,
      ]}
      zoom={APP_CONFIG.map.defaultZoom}
      className="h-full w-full"
    >
      <TileLayer
        attribution="&copy; OpenStreetMap contributors"
        url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
      />
    </MapContainer>
  );
}