import { api } from "@/infrastructure/api/client";
import { API_ENDPOINTS } from "@/infrastructure/api/endpoints";

export const StationRepository = {
  async getAll() {
    const { data } = await api.get(API_ENDPOINTS.stations);

    return data;
  },
};