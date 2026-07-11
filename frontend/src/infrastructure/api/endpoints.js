export const ENDPOINTS = {
  stations: {
    nearby: "/stations/nearby",
    details: (id) => `/stations/${id}`,
  },

  community: {
    feed: "/community",
    report: "/community/report",
  },

  auth: {
    google: "/auth/google",
    apple: "/auth/apple",
    logout: "/auth/logout",
  },
};