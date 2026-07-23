import api from "@/infrastructure/api/client";
import { ENDPOINTS } from "@/infrastructure/api/endpoints";

export async function getStations() {
  const response = await api.get(ENDPOINTS.stations.list);

  return response.data.data;
}

export async function getNearbyStations({
  lat,
  lng,
  radius = 25,
  limit,
}) {
  const params = {
    lat,
    lng,
    radius,
  };

  if (limit) {
    params.limit = limit;
  }

  const response = await api.get(
    ENDPOINTS.stations.nearby,
    {
      params,
    }
  );

  return response.data.data;
}