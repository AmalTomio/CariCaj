import api from "@/infrastructure/api/client";
import { ENDPOINTS } from "@/infrastructure/api/endpoints";

export async function getStations(params = {}) {
  const endpoint =
    params.lat && params.lng
      ? ENDPOINTS.stations.nearby
      : ENDPOINTS.stations.list;

  const response = await api.get(endpoint, {
    params,
  });

  return response.data.data;
}