"use client";

import { useQuery } from "@tanstack/react-query";
import { getStations } from "../repository/station.repository";

export function useStations(params = {}) {
  return useQuery({
    queryKey: ["stations", params],
    queryFn: () => getStations(params),

    staleTime: 1000 * 60 * 5,
    retry: 1,
  });
}