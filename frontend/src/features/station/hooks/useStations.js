"use client";

import { useQuery } from "@tanstack/react-query";

import { getStations } from "../repository/station.repository";

export function useStations() {
  return useQuery({
    queryKey: ["stations"],
    queryFn: getStations,
    staleTime: 1000 * 60 * 5,
    retry: 1,
  });
}