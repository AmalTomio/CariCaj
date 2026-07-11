import api from "@/infrastructure/api/client";
import ENDPOINTS from "@/infrastructure/api/endpoints";

export async function getNearbyStations(params) {
  const { data } = await api.get(
    ENDPOINTS.STATIONS.NEARBY,
    {
      params,
    }
  );

  return data;
}