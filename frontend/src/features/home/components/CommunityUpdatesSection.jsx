import { Card, CardContent } from "@/components/ui/card";
import { Skeleton } from "@/components/ui/skeleton";

export default function CommunityUpdatesSection() {
  return (
    <section className="space-y-4">
      <h2 className="text-lg font-semibold">
        Community Updates
      </h2>

      <Card>
        <CardContent className="space-y-3 p-4">
          <Skeleton className="h-5 w-40" />
          <Skeleton className="h-4 w-full" />
        </CardContent>
      </Card>
    </section>
  );
}