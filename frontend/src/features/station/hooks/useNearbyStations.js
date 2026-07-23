"use client";

import { useQuery } from "@tanstack/react-query";

import { getNearbyStations } from "../repository/station.repository";

export function useNearbyStations(params) {
  const { lat, lng } = params ?? {};

  return useQuery({
    queryKey: ["nearby-stations", params],
    queryFn: () => getNearbyStations(params),
    enabled: !!lat && !!lng,
    staleTime: 1000 * 60 * 5,
    retry: 1,
  });
}