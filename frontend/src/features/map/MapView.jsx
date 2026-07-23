import dynamic from "next/dynamic";

const MapViewClient = dynamic(
  () => import("./MapViewClient"),
  {
    ssr: false,
    loading: () => (
      <div className="flex h-full w-full items-center justify-center">
        Loading map...
      </div>
    ),
  }
);

export default MapViewClient;