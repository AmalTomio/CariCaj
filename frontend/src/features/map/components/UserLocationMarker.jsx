"use client";

import { Marker, Popup } from "react-leaflet";
import L from "leaflet";

const icon = new L.Icon({
  iconUrl: "/marker-icon.png",
  shadowUrl: "/marker-shadow.png",
  iconSize: [25, 41],
  iconAnchor: [12, 41],
});

export default function UserLocationMarker({ location }) {
  if (!location) return null;

  return (
    <Marker
      position={[
        location.latitude,
        location.longitude,
      ]}
      icon={icon}
    >
      <Popup>Your Current Location</Popup>
    </Marker>
  );
}