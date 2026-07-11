import { useQuery } from "@tanstack/react-query";

import {
  getNearbyStations,
} from "../repository/station.repository";

export function useNearbyStations(params) {
  return useQuery({
    queryKey: ["stations", params],

    queryFn: () => getNearbyStations(params),
  });
}