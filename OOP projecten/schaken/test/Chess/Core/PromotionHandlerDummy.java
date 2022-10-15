package Chess.Core;

import Chess.Core.Pieces.Pawn;

public class PromotionHandlerDummy implements PromotionHandler
{
    public boolean isCalled = false;

    @Override
    public void handlePromotion(Pawn pawn, Coords location)
    {
        isCalled = true;
    }
}